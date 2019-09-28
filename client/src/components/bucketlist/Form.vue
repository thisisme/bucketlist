<template>
  <form @submit.prevent="handleSubmit(item)">
    <div class="form-group">
      <label
        for="bucketlist_name"
        class="form-control-label">name</label>
      <input
        id="bucketlist_name"
        v-model="item.name"
        :class="['form-control', isInvalid('name') ? 'is-invalid' : '']"
        type="text"
        placeholder="The name of the bucketlist."
        @input="handleUpdateField('name', $event.target.value)">
      <div
        v-if="isInvalid('name')"
        class="invalid-feedback">{{ violations.name }}</div>
    </div>
    <div class="form-group">
      <label
        for="bucketlist_description"
        class="form-control-label">description</label>
      <input
        id="bucketlist_description"
        v-model="item.description"
        :class="['form-control', isInvalid('description') ? 'is-invalid' : '']"
        type="text"
        placeholder="The description of the bucketlist."
        @input="handleUpdateField('description', $event.target.value)">
      <div
        v-if="isInvalid('description')"
        class="invalid-feedback">{{ violations.description }}</div>
    </div>
    <div class="form-group">
      <label
        for="bucketlist_updatedAt"
        class="form-control-label">updatedAt</label>
      <input
        id="bucketlist_updatedAt"
        v-model="item.updatedAt"
        :class="['form-control', isInvalid('updatedAt') ? 'is-invalid' : '']"
        type="text"
        placeholder="When the bucketlist was updated."
        @input="handleUpdateField('updatedAt', $event.target.value)">
      <div
        v-if="isInvalid('updatedAt')"
        class="invalid-feedback">{{ violations.updatedAt }}</div>
    </div>
    <div class="form-group">
      <label
        for="bucketlist_createdAt"
        class="form-control-label">createdAt</label>
      <input
        id="bucketlist_createdAt"
        v-model="item.createdAt"
        :class="['form-control', isInvalid('createdAt') ? 'is-invalid' : '']"
        type="dateTime"
        placeholder="When the bucketlist was created."
        @input="handleUpdateField('createdAt', $event.target.value)">
      <div
        v-if="isInvalid('createdAt')"
        class="invalid-feedback">{{ violations.createdAt }}</div>
    </div>

    <button
      type="submit"
      class="btn btn-success">Submit</button>
  </form>
</template>

<script>
export default {
  props: {
    handleSubmit: {
      type: Function,
      required: true
    },

    handleUpdateField: {
      type: Function,
      required: true
    },

    values: {
      type: Object,
      required: true
    },

    errors: {
      type: Object,
      default: () => {}
    },

    initialValues: {
      type: Object,
      default: () => {}
    }
  },

  computed: {
    // eslint-disable-next-line
    item () {
      return this.initialValues || this.values
    },

    violations () {
      return this.errors || {}
    }
  },

  methods: {
    isInvalid (key) {
      return Object.keys(this.violations).length > 0 && this.violations[key]
    }
  }
}
</script>
