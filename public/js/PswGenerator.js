/**
 * Created by Patrick on 10.05.2017.
 */

var minLength = 8;

var characterSet = {'abcdefghijklmnopqrstuvwxyz','ABCDEFGHIJKLMNOPQRSTUVWXYZ','1234567890','!§$%&()=?+*#-_{[]}~'};

var sumLength = function() {
    var sum = 0;
    for(var i = 0; i < characterSet.length(); i++) {
        sum += characterSet[i].length();
    }
    return sum;
}

var generate = function(minLength) {
    for(var i = 0; i < sumLength(); i++) {

    }
    alert(sumLength());
};

var checkForPassword = function(pswField) {

};