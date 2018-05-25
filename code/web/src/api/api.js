import axios from 'axios'

let axiosInstance = axios.create({
  baseURL: 'http://api.woshilaok.com/',
  timeout: 1000,
  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
});

const serverUrlList = {
    'getShenKeyInfoList' : 'shenkey/v1/getShenKeyInfoList',
};


function networkRequest(url, data){
    return new Promise( (resolve, reject) => {
        $.ajax({
            url: url,
            type: "POST",
            async: true,
            data: data,
            dataType: "json",
            success:function(data){
                resolve(data);
            },
            error:function(){
                reject();
            }
        })
    });
}

export default {
    serverUrlList,
    networkRequest
} 