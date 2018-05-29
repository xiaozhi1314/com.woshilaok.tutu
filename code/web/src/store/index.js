import Vue from 'vue'
import Vuex from 'vuex'
import Api from '@/api/api.js'
import ShowPhotoAlbum from '@/store/modules/ShowPhotoAlbum.js'

Vue.use(Vuex);

const state = {
    page: 1,
    pageSize: 10,
    waitStatus: false,
    waitResult: '',
}
const getters = {

};

const actions = {
};

const mutations = {
    setWaitStatus(state, waitStatus){
        state.waitStatus = waitStatus;
    },
    setWaitResult(state, waitResult){
        state.waitResult = waitResult;
    }
}

export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations,
    modules: {
        ShowPhotoAlbum,
        // products
    },
})