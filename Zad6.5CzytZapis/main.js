
//   const newArr = arrA.filter(x => !arrB.includes(x)).concat(arrB.filter(x => !arrA.includes(x)));

//to jest bardziej czytelny zapis tego fragmentu
const newArr = [
    ...arrA.filter(x => !arrB.includes(x)),
    ...arrB.filter(x => !arrA.includes(x)),
  ];

//lub ten
const arrA = [1, 2, 3, 4];
const arrB = [3, 4, 5, 6];

const uniqueElements = arrA
  .filter(x => !arrB.includes(x))
  .concat(arrB.filter(x => !arrA.includes(x)));

console.log(uniqueElements);