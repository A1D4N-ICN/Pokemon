let actions = {
    createPokemon({commit}, pokemon) {
        axios.post('/api/pokemon', pokemon)
            .then(res => {
                commit('CREATE_POKEMON', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    updatePokemon({commit}, pokemon) {
        axios.put('/api/pokemon', pokemon)
            .then(res => {
                commit('UPDATE_POKEMON', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchPokemon({commit}) {
        axios.get('/api/pokemon')
            .then(res => {
                commit('FETCH_POKEMON', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deletePokemon({commit}, pokemon) {
        axios.delete(`/api/pokemon/${pokemon.id}`)
            .then(res => {
                if (res.data.success === true)
                    commit('DELETE_POKEMON', pokemon)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions