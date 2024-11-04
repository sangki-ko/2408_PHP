/*
    Promise 객체
    
 */

function iAmSleep(flg) {
    return new Promise((resolve, reject) => {
        if(flg === true) {
            resolve('성공');
        }else {
            reject('실패');
        }

    })
}

iAmSleep(true)
.then(data => console.log(data))
.catch(error => console.log(error))
.finally(() => console.log('파이널리'));

// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 1000);
// }, 1000);

function iAmSleepy(str, ms) {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

iAmSleepy('A', 3000)
.then(() => iAmSleepy('B', 2000))
.then(() => iAmSleepy('C', 1000));