import axios from 'axios'

const baseURL = 'http://tutu.woshilaok.com/';
// let axiosInstance = axios.create({
//   baseURL: baseURL,
//   timeout: 1000,
//   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
// });

const serverUrlList = {
	'getPhotoTagsList'     : 'api.php/album/getalbumtypelist',
	'getPhotoAlbumList'    : 'api.php/album/getalbumlist',
	'getPhotoAlbumDetail'  : 'api.php/album/detail',
};


function networkRequest(url, data){
	return new Promise( (resolve, reject) => {
		$.ajax({
			url: baseURL+url,
			type: "POST",
			async: true,
			data: data,
			dataType: "jsonp",
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