<template>
    <tr>
        <td>
            <img :alt="player.username" :src="player.smallAvatarUrl">
        </td>
        <td>
            <div class="is-size-6"><a :href="player.profile_url">{{ player.username }}</a></div>
        </td>
        <td>{{ player.rankTier }}</td>
        <td>{{ player.mmr }}</td>
        <td><button class="button is-danger is-outlined" @click="addToDire">Dire</button>&nbsp;<button class="button is-success is-outlined" @click="addToRadiant">Radiant</button></td>
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
