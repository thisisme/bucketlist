<template>
  <div>
    <h1>BucketList List</h1>

    <div
      v-if="isLoading"
      class="alert alert-info">Loading...</div>
    <div
      v-if="deletedItem"
      class="alert alert-success">{{ deletedItem['@id'] }} deleted.</div>
    <div
      v-if="error"
      class="alert alert-danger">{{ error }}</div>

    <span v-if="view">
      <button
        :disabled="!view['hydra:previous']"
        type="button"
        class="btn btn-basic btn-sm"
        @click="getPage(view['hydra:first'])">First</button>
      &nbsp;
      <button
        :disabled="!view['hydra:previous']"
        type="button"
        class="btn btn-basic btn-sm"
        @click="getPage(view['hydra:previous'])">Previous</button>
      &nbsp;
      <button
        :disabled="!view['hydra:next']"
        type="button"
        class="btn btn-basic btn-sm"
        @click="getPage(view['hydra:next'])">Next</button>
      &nbsp;
      <button
        :disabled="!view['hydra:last']"
        type="button"
        class="btn btn-basic btn-sm"
        @click="getPage(view['hydra:last'])">Last</button>
      &nbsp;
    </span>

    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>name</th>
            <th>description</th>
            <th>updatedAt</th>
            <th>createdAt</th>
            <th colspan="2" />
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in items"
            :key="item['@id']">
            <td>
              <router-link
                v-if="item"
                :to="{name: 'BucketListShow', params: { id: item['@id'] }}">
                {{ item['@id'] }}
              </router-link>
            </td>
            <td>
              <router-link
                v-if="item"
                :to="{name: 'BucketListShow', params: { id: item['@id'] }}">
                {{ item['name'] }}
              </router-link>
            </td>
            <td>
              <router-link
                v-if="item"
                :to="{name: 'BucketListShow', params: { id: item['@id'] }}">
                {{ item['description'] }}
              </router-link>
            </td>
            <td>
              <router-link
                v-if="item"
                :to="{name: 'BucketListShow', params: { id: item['@id'] }}">
                {{ item['updatedAt'] }}
              </router-link>
            </td>
            <td>
              <router-link
                v-if="item"
                :to="{name: 'BucketListShow', params: { id: item['@id'] }}">
                {{ item['createdAt'] }}
              </router-link>
            </td>
            <td>
              <router-link
                :to="{name: 'BucketListShow', params: { id: item['@id'] }}">
                <span
                  class="fa fa-search"
                  aria-hidden="true" />
                <span class="sr-only">Show</span>
              </router-link>
            </td>
            <td>
              <router-link :to="{name: 'BucketListUpdate', params: { id: item['@id'] }}">
                <span
                  class="fa fa-pencil"
                  aria-hidden="true" />
                <span class="sr-only">Edit</span>
              </router-link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <router-link
      :to="{ name: 'BucketListCreate' }"
      class="btn btn-primary">Create</router-link>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  computed: mapGetters({
    deletedItem: 'bucketlist/del/deleted',
    error: 'bucketlist/list/error',
    items: 'bucketlist/list/items',
    isLoading: 'bucketlist/list/isLoading',
    view: 'bucketlist/list/view'
  }),

  created () {
    this.getPage()
  },

  methods: mapActions({
    getPage: 'bucketlist/list/default'
  })
}
</script>
