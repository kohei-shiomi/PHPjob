//問1

let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
function isEven()

{
    let num = [];
    for (let i=0; i<numbers.length; i++){
        if (numbers [i] % 2 === 0){
            num.push(numbers[i]);
        }
    }
    
    console.log(num + 'は偶数です');
    
}
isEven(); 

//問2
class Car {
    constructor(gass, number){
        this.gass = gass;
        this.number = number;
    }
    getNumGas(){
        console.log('ガソリンは' + this.gass + 'です。 ナンバーは' + this.number + 'です');
        }
}
let redcar = new Car ('regular','12-34');
redcar.getNumGas();