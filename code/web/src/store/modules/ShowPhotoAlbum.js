import Vue from 'vue'
import Vuex from 'vuex'
import Api from '@/api/api.js'

Vue.use(Vuex);

const state = {
    isShow: false
}
const getters = {

};

const actions = {
};

const mutations = {
    setIsShow(state, isShow){
        state.isShow = isShow;
    }
}

export default{
    state,
    getters,
    actions,
    mutations
}