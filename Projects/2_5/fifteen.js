import Game from './puzzle.js';

const gamer = new Game(
    document.querySelectorAll('#container > div')[0],
    './background.jpg',
    500,
    3
);
//create a new version 4x4
const gamer2 = new Game(
    document.querySelectorAll('#container > div')[1],
    './background2.jpg',
    500,
    4
);

//create a new 5x5 version 
const gamer3 = new Game(
    document.querySelectorAll('#container > div')[2],
    './background3.jpg',
    500,
    10
);


gamer.onSwap = function(movements){
    console.log(movements);
};
