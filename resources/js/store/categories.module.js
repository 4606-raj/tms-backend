import categoryService from "../services/categories.service";

const initialState = [];

export const categories = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await categoryService.fetchAll();
      
      commit("setCategories", response);
    },

    async setCurrentSubcategories({ commit }, payload) {
      commit('setCurrentSubcategories', payload)
    }
    

  },
  mutations: {
    setCategories(state, payload) {
      state.categories = payload;
    },

    setCurrentSubcategories(state, payload) {
      state.currentSubcategories = payload;
    }
    
  },

  getters: {
    getAll(state) {
      return state.categories;
    },
    getCurrentSubcategories(state) {
      return state.currentSubcategories;
    },
  },
};
