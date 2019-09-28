<template>
  <div>
    <h1>Edit {{ item && item['@id'] }}</h1>

    <div
      v-if="created"
      class="alert alert-success"
      role="status">{{ created['@id'] }} created.</div>
    <div
      v-if="updated"
      class="alert alert-success"
      role="status">{{ updated['@id'] }} updated.</div>
    <div
      v-if="isLoading || deleteLoading"
      class="alert alert-info"
      role="status">Loading...</div>
    <div
      v-if="error"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true" /> {{ error }}
    </div>
    <div
      v-if="deleteError"
      class="alert alert-danger"
      role="alert">
      <span
        class="fa fa-exclamation-triangle"
        aria-hidden="true" /> {{ deleteError }}
    </div>

    <BucketListForm
      v-if="item"
      :handle-submit="onSendForm"
      :handle-update-field="updateField"
      :values="item"
      :errors="violations"
      :initial-values="retrieved" />

    <router-link
      v-if="item"
      :to="{ name: 'BucketListList' }"
      class="btn btn-default">Back to list</router-link>
    <button
      class="btn btn-danger"
      @click="del">Delete</button>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import BucketListForm from './Form.vue'

export default {
  components: {
    BucketListForm
  },

  data () {
    return {
      item: {}
    }
  },

  computed: {
    ...mapGetters({
      isLoading: 'bucketlist/update/isLoading',
      error: 'bucketlist/update/error',
      deleteError: 'bucketlist/del/error',
      deleteLoading: 'bucketlist/del/isLoading',
      created: 'bucketlist/create/created',
      deleted: 'bucketlist/del/deleted',
      retrieved: 'bucketlist/update/retrieved',
      updated: 'bucketlist/update/updated',
      violations: 'bucketlist/update/violations'
    })
  },

  watch: {
    // eslint-disable-next-line object-shorthand,func-names
    deleted: function (deleted) {
      if (!deleted) {
        return
      }

      this.$router.push({ name: 'BucketListList' })
    }
  },

  beforeDestroy () {
    this.reset()
  },

  created () {
    this.retrieve(decodeURIComponent(this.$route.params.id))
  },

  methods: {
    ...mapActions({
      createReset: 'bucketlist/create/reset',
      deleteItem: 'bucketlist/del/del',
      delReset: 'bucketlist/del/reset',
      retrieve: 'bucketlist/update/retrieve',
      updateReset: 'bucketlist/update/reset',
      update: 'bucketlist/update/update',
      updateRetrieved: 'bucketlist/update/updateRetrieved'
    }),

    del () {
      if (window.confirm('Are you sure you want to delete this bucketlist ?')) {
        this.deleteItem(this.retrieved)
      }
    },

    reset () {
      this.updateReset()
      this.delReset()
      this.createReset()
    },

    onSendForm () {
      this.update()
    },

    updateField (field, value) {
      this.updateRetrieved({ [field]: value })
    }
  }
}
</script>
