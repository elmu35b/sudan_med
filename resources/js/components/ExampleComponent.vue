<template>
  <div class="row mb-3">
    <label for="phone" class="col-md-4 col-form-label text-md-end">مواعيد الفتح
    </label>
    <div class="col-md-6">
      <input
        id="open_at"
        type="text"
        class="form-control @error('open_at') is-invalid @enderror"
        name="open_at"
        required
      />
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
