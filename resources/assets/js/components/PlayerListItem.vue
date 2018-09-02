<template>
    <tr>
        <td class = "align-middle">
            <img :alt="player.username" :src="player.smallAvatarUrl">
        </td>
        <td class = "align-middle">
            <div class="is-size-6"><a class = "has-text-grey-dark" :href="player.profile_url">{{ player.username }}&nbsp;</a>
            <i class="fas fa-shield-alt" v-if="player.is_admin"></i>
            
            </div>
        </td>
        <td class = "align-middle">{{ player.rankTier }}</td>
        <td class = "align-middle">{{ player.mmr }}</td>
        <td class = "align-middle"><button class="button is-danger is-outlined" @click="addToDire">Dire</button>&nbsp;<button class="button is-success is-outlined" @click="addToRadiant">Radiant</button></td>
    </tr>
</template>

<script>
export default {
  props:{
      'player': Object
  },
  mounted:()=>{
  },
  methods:{
      addToDire(){
          //send to match creator
          this.$bus.$emit('add-dire', this.player)
      },
      addToRadiant(){
          //send to match creator
          this.$bus.$emit('add-radiant', this.player)
      }
  }
}
</script>
{{--<i :class="player.persona_state"></i>--}}