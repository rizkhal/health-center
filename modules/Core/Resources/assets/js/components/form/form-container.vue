<template>
  <div class="flex flex-col rounded border bg-white shadow">
    <template v-if="!$slots['title'] && title">
      <div class="flex flex-row border-b px-4 py-4">
        <h1 class="text-xl">{{ title }}</h1>
      </div>
    </template>
    <template v-if="$slots['title']">
      <div class="flex flex-row border-b px-4 py-4">
        <slot name="title" />
      </div>
    </template>
    <div class="px-4 py-6">
      <slot />
    </div>
    <div class="ml-auto flex flex-row items-center space-x-2 p-4">
      <button
        v-if="enableCancel"
        class="btn-red btn-ring-red"
        @click.prevent="$emit('onCancel')"
      >
        {{ cancelText }}
      </button>
      <v-button
        :loading="loading"
        :text="submitText"
        @click.prevent="$emit('onSubmit')"
      >
      </v-button>
    </div>
  </div>
</template>
<script>
export default {
  emits: ["onSubmit", "onCancel"],
  props: {
    title: {
      type: String,
      required: false,
    },
    loading: {
      type: Boolean,
      default: false,
    },
    submitText: {
      type: String,
      default: () => "Simpan",
    },
    enableCancel: {
      type: Boolean,
      default: false,
    },
    cancelText: {
      type: String,
      default: () => "Batal",
    },
  },
};
</script>
