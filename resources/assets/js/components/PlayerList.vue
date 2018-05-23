<template>
  <!-- show a search box and list of players -->


    <div>
 <div class ="box">
                <article class = "media">
          <div class="media-content">
                        <div class="content"> 
                            <h3 class="title">Player Search</h3>
      
        <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="Search for tards by Username" id="inputSearch" v-model="search_term">
            <span class="icon is-small is-left">
                <i class="fas fa-search" aria-hidden="true"></i>
            </span>
        </p>

        <table class="table is-striped" id="playerTable">
            <thead>
                <th></th>
                <th>Username</th>
                <th>Rank</th>
                <th>MMR estimate</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <player-list-item v-for="player in filteredPlayers" :player="player" :key="player.id64">
                </player-list-item>
            </tbody>
        </table>
                                </div>
                    </div>
                </article></div>
    </div>  
</template>


<script>
import PlayerListItem from '../components/PlayerListItem.vue' 
export default {
  props: [
      'players'
  ],
  data: () => {
      return{
          search_term: ""
      }
  },
  components:{
      PlayerListItem
  },
  computed:{
      filteredPlayers: function(){
          return this.players.filter((player) => {
              return player.username.toLowerCase().includes(this.search_term.toLowerCase())
          })
      }
  }
}
</script>
