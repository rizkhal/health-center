<script setup>
import { onMounted } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  socials: Object,
  accounts: Object,
});

onMounted(() => {
  if (!form.fields.length) {
    clone();
  }

  if (props.accounts) {
    form.fields = props.accounts.map((v) => {
      return {
        url: v.url,
        type: v.type,
        name: v.name,
      };
    });
  }
});

const form = useForm({
  fields: [],
});

const clone = () => {
  form.fields.push({
    url: null,
    type: null,
    name: null,
    target: true,
  });
};

const remove = (index) => {
  form.fields.splice(index, 1);
};

const submit = () => {
  form.post(route("dashboard.kamen-theme.setting.media-social"));
};
</script>
<template>
  <v-form-container title="Sosial Media" @onSubmit="submit" class="mb-6">
    <div
      class="mt-3 flex flex-row items-center space-x-2"
      v-for="(field, index) in form.fields"
      :key="index"
    >
      <v-select
        label="Sosial Media"
        class="w-full"
        v-model="field.type"
        :error="form.errors[`fields.${index}.type`]"
      >
        <option
          :value="item.value"
          v-for="(item, index) in socials"
          :key="index"
        >
          {{ item.label }}
        </option>
      </v-select>

      <v-text
        label="Nama Akun"
        class="w-full"
        v-model="field.name"
        :error="form.errors[`fields.${index}.name`]"
      />

      <v-text
        label="Link"
        class="w-full"
        v-model="field.url"
        :error="form.errors[`fields.${index}.url`]"
      />

      <button
        class="btn-red mt-[22px] py-3"
        @click.prevent="remove(index)"
        :disabled="form.fields.length === 1"
      >
        <v-icon name="MinusIcon" class="h-4 w-4" />
      </button>
    </div>
    <div class="flex justify-end">
      <button class="btn-purple mt-[22px] py-3" @click.prevent="clone">
        <v-icon name="PlusIcon" class="h-4 w-4" />
      </button>
    </div>
  </v-form-container>
</template>
