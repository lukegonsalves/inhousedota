<template>
    <div>
        <div class="columns is-centered">
            <!-- <figure class="image">
                <img src="https://i.ytimg.com/vi/aiLwA7BkftI/maxresdefault.jpg">
            </figure>  -->
            
            <div class="column is-half">
                <player-list :players="players"></player-list>
            </div> 
            <div class="column is-one-third">
                <match-creator v-if="user.is_admin"></match-creator>
            </div>

            <!-- <figure class="image">
                <img src="https://i.ytimg.com/vi/iW4Q7dfoGUE/maxresdefault.jpg">
            </figure> -->
        </div>
    </div>
</template>

<script>
import PlayerList from '../components/PlayerList.vue' 
import MatchCreator from '../components/MatchCreator.vue' 
export default {
    name: "player-page",
    props:[
        'players',
        'user'
    ],
      components:{
      PlayerList,
      MatchCreator
  },
}
</script>
