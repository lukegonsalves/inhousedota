<template>
    <tr>
        <td>{{player.username}} - {{player.mmr}} <button class="delete is-small"></button></td>
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

  }
}
</script>