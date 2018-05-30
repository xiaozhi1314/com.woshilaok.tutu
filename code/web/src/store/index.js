import Vue from 'vue'
import Vuex from 'vuex'
import Api from '@/api/api.js'
import PhotoAlbum from '@/store/modules/PhotoAlbum.js'
import ShowPhotoAlbum from '@/store/modules/ShowPhotoAlbum.js'

Vue.use(Vuex);

const state = {
  page: 1,
  pageSize: 10,
  waitStatus: false,
  waitResult: '',

  currentPhotoTag: '',
  photoTagsList: [],
}
const getters = {
};

const actions = {
  getPhotoTagsList(context, requestParams){
    Api.networkRequest(Api.serverUrlList.getPhotoTagsList, {
      __type: 'jsonp',
      tags: requestParams['tags'],
      pageIndex: requestParams['page'],
    }).then(function(response){
      // 处理业务逻辑
      if(response.success === '1'){
        context.commit('setPhotoTagsList', response.data);
        context.commit('setWaitResult', response.message);
        context.commit('setWaitStatus', false);
      }
    });
  }
};

const mutations = {
  setWaitStatus(state, waitStatus){
    state.waitStatus = waitStatus;
  },
  setWaitResult(state, waitResult){
    state.waitResult = waitResult;
  },
  setPhotoTagsList(state, list){
    state.photoTagsList = list;
  },
  addPhotoTagsList(state, list){
    state.photoTagsList = state.photoTagsList.concat(list);
  },
  setPhotoTag(state, photoTag){
    state.currentPhotoTag = photoTag;
  },
}

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations,
  modules: {
    PhotoAlbum,
    ShowPhotoAlbum,
    // products
    },
  })