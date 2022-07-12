<template>
  <div>
    <v-form-container
      :title="title"
      @onCancel="$modal.close()"
      @onSubmit="save"
    >
      <div class="flex flex-col space-y-4">
        <v-text
          v-model="form.name"
          :error="form.errors.name"
          label="Kategori"
          :required="true"
        />
        <v-textarea
          v-model="form.description"
          :error="form.errors.description"
          label="Keterangan"
        />
      </div>
    </v-form-container>
  </div>
</template>
<script>
export default {
  props: {
    title: String,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: null,
        description: null,
      }),
    };
  },
  methods: {
    save() {
      this.form.post(`category`, {
        onSuccess: () => {
          this.form.reset();
          this.$modal.close();
        },
      });
    },
  },
};
</script>
