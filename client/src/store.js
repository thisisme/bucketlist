import Vue from 'vue'
import Vuex from 'vuex'
import bucketlist from './store/modules/bucketlist/'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: { bucketlist }
})
