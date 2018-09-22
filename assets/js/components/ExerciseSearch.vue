<template>
    <div class="field">
        <div class="control">
            <input class="input is-primary" type="text" :placeholder="placeHolder" v-model="searchQuery">
        </div>
    </div>
</template>

<script>
    export default {
        name: "exercise-search",
        props: ['searchText'],
        data() {
            return {
                placeHolder: 'Find an exercise'
            }
        },
        computed:{
          searchQuery: {
              get(){
                  return this.searchText;
              },
              set(value){
                  this.$emit('update:searchText', value)
              }
          }
        }
    }
</script>

<style scoped>

</style>