import channelsService from "../services/channels.service";

const initialState = [];

export const channels = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await channelsService.fetchAll();
      
      commit("setChannels", response);
    },

  },
  mutations: {
    setChannels(state, payload) {
      state.channels = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.channels;
    },
  },
};
