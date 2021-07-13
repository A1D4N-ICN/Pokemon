<template>
    <div class="overflow-auto">
        <b-pagination
          v-model="currentPage"
          :total-rows="pokemon.length"
          :per-page="perPage"
          aria-controls="pokemon-table"
        ></b-pagination>

        <b-table id="pokemon-table" :items="pokemon" :fields="fields" :per-page="perPage" :current-page="currentPage" striped responsive="sm">
            <template #cell(show_details)="row">
                <b-button size="sm" @click="row.toggleDetails" class="mr-2">
                    {{ row.detailsShowing ? 'Hide' : 'Show'}} Details
                </b-button>
            </template>

            <template #row-details="row">
                <b-card>
                    <b-img center :src="'/storage/'+row.item.sprite" alt="Center image"></b-img>

                    <b-row class="mb-2">
                        <b-col sm="3" class="text-sm-right"><b>Id:</b></b-col>
                        <b-col>{{ row.item.id }}</b-col>
                    </b-row>
                
                    <b-row class="mb-2">
                        <b-col sm="3" class="text-sm-right"><b>Name:</b></b-col>
                        <b-col>{{ row.item.name }}</b-col>
                    </b-row>

                    <b-row class="mb-2">
                        <b-col sm="3" class="text-sm-right"><b>Base Experience:</b></b-col>
                        <b-col>{{ row.item.base_experience }}</b-col>
                    </b-row>

                    <b-row class="mb-2">
                        <b-col sm="3" class="text-sm-right"><b>Height:</b></b-col>
                        <b-col>{{ row.item.height }}</b-col>
                    </b-row>

                    <b-row class="mb-2">
                        <b-col sm="3" class="text-sm-right"><b>Weight:</b></b-col>
                        <b-col>{{ row.item.weight }}</b-col>
                    </b-row>

                    <div class="float-right">
                        <b-button variant="danger" @click="deletePokemon(row.item)"><i style="color:white" class="fa fa-trash"></i></b-button>
                    </div>
                </b-card>
            </template>
        </b-table>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Pokemon",
        data() {
            return {
                fields: ['id', 'name', 'show_details'],
                perPage: 20,
                currentPage: 1
            }
        },
        mounted() {
            this.$store.dispatch('fetchPokemon')
        },
        methods: {
            deletePokemon(pokemon) {
                if(confirm('Are you sure you want to delete this pokemon: '+pokemon.name+'?'))
                this.$store.dispatch('deletePokemon',pokemon)
            }
        },
        computed: {
            ...mapGetters([
                'pokemon'
            ])
        }
    }
</script>

<style scoped>

</style>