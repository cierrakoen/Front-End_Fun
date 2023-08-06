//creating game board
export default class Board{
    //holds the elements we need 
    constructor(game, ind){
        this.isEmpty = false;
        this.index = ind;
        this.game = game;
        this.width = this.game.width / this.game.dim;
        this.height = this.game.height / this.game.dim;

        //create each div
        this.el = this.createDiv();
        game.el.appendChild(this.el);

        if (this.index === this.game.dim * this.game.dim -1){
            this.isEmpty = true;
            return;
        }

        this.setImg();
        this.setPosInd(this.index);
    }

    //creates each of the blocks needed for game based on user input
    createDiv(){
        //creating each block as div
        const div = document.createElement('div');
        div.style.backgroundSize = `${this.game.width}px ${this.game.height}px`;
        div.style.position = 'absolute';
        div.style.border = '2px solid black';
        
        //understanding variables
        div.onmouseenter = () => {
            //indexes of div clicked and empty div
            const currentDivInd = this.game.findPos(this.index);
            const emptyDivInd = this.game.findEmpty();

            //finding the coords of the indexes
            const{x,y} = this.getCoords(currentDivInd);
            const{x: emptyX,y: emptyY} = this.getCoords(emptyDivInd);

            console.log(x,y);
            console.log(emptyX,emptyY);

            // if the coords are adjacent
            if((x === emptyX || y === emptyY)&&
                ((Math.abs(x-emptyX) || Math.abs(y-emptyY))===1)){
                    div.style.border = '2px solid red';
                }
        }

        div.onmouseleave = () => {
            div.style.border = '2px solid black';
        }
        
        div.onclick = () => {
            console.log("Click", this.index,this.game.findPos(this.index));
            console.log("Empty ind: ",this.game.findEmpty());
            
            //indexes of div clicked and empty div
            const currentDivInd = this.game.findPos(this.index);
            const emptyDivInd = this.game.findEmpty();

            //finding the coords of the indexes
            const{x,y} = this.getCoords(currentDivInd);
            const{x: emptyX,y: emptyY} = this.getCoords(emptyDivInd);

            console.log(x,y);
            console.log(emptyX,emptyY);

            // if the coords are adjacent
            if((x === emptyX || y === emptyY)&&
                ((Math.abs(x-emptyX) || Math.abs(y-emptyY))===1)){
                console.log("I can swap");
                this.game.totalMoves++;
                if(this.game.onSwap && typeof this.game.onSwap === 'function'){
                    this.game.onSwap(this.game.totalMoves);
                }
                this.game.canSwap(currentDivInd,emptyDivInd,true);
            }
        };

        return div;
    }

    //set the image 
    setImg(){
        const {x, y} = this.getCoords(this.index);
        //controls postion of new div
        const left = this.width * x;
        const top = this.height * y;

        this.el.style.width = `${this.width}px`;
        this.el.style.height = `${this.height}px`;

        //set div background image
        this.el.style.backgroundImage = `url(${this.game.img_src})`;

        //making sure each div matched the same as the boxes
        this.el.style.backgroundPosition = `-${left}px -${top}px`;

    }
    //create animation positions
    setPos(finalInd, animate, firstInd){
        const {left, top} = this.getPosInd(finalInd);
        const{left: curLeft, top: curTop} = this.getPosInd(firstInd);
        if(animate){
            if(left !== curLeft){
                this.animate('left',curLeft,left);
            }else if(top !== curTop){
                this.animate('top',curTop,top);
            }

        }else{
            this.el.style.left = `${left}px`;
            this.el.style.top = `${top}px`;
        }
    }

    animate(pos,curPos,desPos){
        const duration = 200;
        const rate = 100;
        let step = rate* Math.abs((desPos-curPos))/duration;
        let id = setInterval(() => {
            if(curPos < desPos){
                curPos = Math.min(desPos,curPos + step);
                if(curPos >= desPos){
                    clearInterval(id)
                }

            }else{
                curPos = Math.max(desPos,curPos - step);
                if(curPos <= desPos){
                    clearInterval(id)
                }
            }

            this.el.style[pos] = curPos+'px';
        }, duration)
    }
    //sets postion index for swap
    setPosInd(index){
        const {left, top} = this.getPosInd(index);
        this.el.style.left = `${left}px`;
        this.el.style.top = `${top}px`;
    }

    //gets position index for swap
    getPosInd(index){
        const {x,y} = this.getCoords(index);
        return {
            left: this.width * x,
            top: this.height * y
        } 
    }

    //gets the cell coordinated
    getCoords(index){
        return{
            x: index % this.game.dim,
            y: Math.floor(index/this.game.dim)
        }
    }

    isAdjacent(){

        //indexes of div clicked and empty div
        const currentDivInd = this.game.findPos(this.index);
        const emptyDivInd = this.game.findEmpty();

        //finding the coords of the indexes
        const{x,y} = this.getCoords(currentDivInd);
        const{x: emptyX,y: emptyY} = this.getCoords(emptyDivInd);

        console.log(x,y);
        console.log(emptyX,emptyY);

        // if the coords are adjacent
        if((x === emptyX || y === emptyY)&&
            ((Math.abs(x-emptyX) || Math.abs(y-emptyY) ===1) )){
            return true;
        }
            return false;
    }

}
