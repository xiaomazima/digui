//生成签名
function verifySign()
{
    var timestamp=Math.floor((new Date().getTime())/1000);
    var noncestr=createRandom(10);
    var token='mazile';
    var arr=[timestamp,noncestr,token];
    arr.sort();
    var str=arr.toString();   //将其使用逗号分隔变成字符串 使用SHA1加密 加密之后的内容需要变成字符串处理
    var sign= CryptoJS.SHA1(str);
    var signture=sign.toString(CryptoJS.enc.utf8);
    return {timestamp:timestamp,noncestr:noncestr,signture:signture};

}
//生成随机字符串
var str=['1','2','3','W','D','X','S','K','Q','5','9'];

function createRandom(n) {
    var randstr='';
    for(var i=0;i<n;i++){
        var id=Math.ceil(Math.random()*10);
        randstr+=str[id];
    }
    return randstr;
}
