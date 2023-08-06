import Board from './create.js';

export default class Game{
    //all elements we need to create the game
    constructor(el,img_src, width,dim){
        //store each element we may need to access
        this.wrapperEl = el;
        this.img_src = img_src;
        this.width = width;
        this.dim = dim;
        this.boxes = [];
        this.shuffling = false;
        this.totalMoves = 0;
        

        //handel events
        this.onFinished = () => {};
        this.onSwap = () => {};

        this.init();

        const img = new Image();
        img.onload = () =>{
            console.log(img.width, img.height);
            //
            this.height = img.height*this.width/ img.width;
            this.el.style.width = `${this.width}px`;
            this.el.style.height = `${this.height}px`;

            this.sections();
        };
        img.src = this.img_src;
        
    }

    init(){
        this.el = this.createBoard();
        this.wrapperEl.appendChild(this.el);
    }

    //creating the element div to be put into container 
    createBoard(){
        const div = document.createElement("div");
        div.style.position = 'relative';
        div.style.margin = '0 auto';

        return div;
    }

    //sections will give us the type of game we need
    sections(){
        for(let i =0; i < this.dim *this.dim; i++){
            this.boxes.push(new Board(this, i));
        }
        this.shuffle();
        console.log(this.boxes);

    }

    shuffle(){
        this.shuffling = true;
        for(let i = this.boxes.length-1; i> 0; i--){
            const j = Math.floor(Math.random()*(i+1));
            this.canSwap(i,j);
        }
        this.shuffling = false;
    }

    //find position of the div to find adjacent boxes
    findPos(ind){
        return this.boxes.findIndex(box => box.index === ind);
    }

    //find empty div
    findEmpty(){
        return this.boxes.findIndex(box => box.isEmpty);
    }

    //swap div blocks
    canSwap(i,j,animate){
        this.boxes[i].setPos(j, animate,i);
        this.boxes[j].setPos(j);
        [this.boxes[i], this.boxes[j]] = [this.boxes[j], this.boxes[i]];
        this.boxes[i].setPos(i);
        this.boxes[j].setPos(j);
        
        if(!this.shuffling && this.isWon()){
            if(this.onFinished && typeof this.onFinished === 'function'){
                this.onFinished.call(this);
            }
        }
    }

    //find the game win
    isWon(){
        for(let i = 0; i <this.boxes.length; i++){
            //check for odd cases
            if( i != this.boxes[i].index){
                if(i=== this.boxes.length-3 && this.boxes[i].index === this.boxes.length-1 && this.boxes[i+1].index === i+1){
                    return true;
                }
                return false;
            }
        }
        return true;
    }
}

window.Game = window.Game || Game;