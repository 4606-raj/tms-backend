import sourcesService from "../services/sources.service";

const initialState = [];

export const sources = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await sourcesService.fetchAll();
      
      commit("setSources", response);
    },

  },
  mutations: {
    setSources(state, payload) {
      state.sources = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.sources;
    },
  },
};
