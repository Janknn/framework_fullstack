<template>
  <MusicLayout>
    <template #title>
      Your API Keys
    </template>
    <template #action>
      <Link href="{{ route('api-keys.create') }}" class="btn btn-primary">Create API Key</Link>
    </template>
    <template #content>
      <table class="table mt-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Key</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="apiKey in apiKeys" :key="apiKey.id">
            <td>{{ apiKey.id }}</td>
            <td>{{ apiKey.name }}</td>
            <td>{{ apiKey.key }}</td>
            <td>
              <form :action="route('api-keys.destroy', apiKey.id)" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" :value="csrf">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  props: {
    apiKeys: Array,
  },
  components: {
    MusicLayout,
  },
  computed: {
    csrf() {
      return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    },
  },
};
</script>
