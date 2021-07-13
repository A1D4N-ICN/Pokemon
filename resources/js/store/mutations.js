let mutations = {
    CREATE_POKEMON(state, pokemon) {
        state.pokemon.unshift(pokemon)
    },
    FETCH_POKEMON(state, pokemon) {
        return state.pokemon = pokemon
    },
    DELETE_POKEMON(state, pokemon) {
        let index = state.pokemon.findIndex(item => item.id === pokemon.id)
        state.pokemon.splice(index, 1)
    }
}
export default mutations