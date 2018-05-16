<template>
  <!-- show a search box and list of players -->
    <div>
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
            </thead>
            <tbody>
                <!-- <player-list-item v-for="player in players" :key="player.id32"></player-list-item> -->
                <tr v-for="player in filteredPlayers">
                    <td>
                        <img :alt="player.username" :src="player.smallAvatarUrl">
                    </td>
                    <td>
                        <a href="player.profile_url">{{ player.username }} </a>
                    </td>
                    <td>{{ player.rankTier }}</td>
                    <td>{{ player.mmr }}</td>
                </tr>
            </tbody>
        </table>
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
