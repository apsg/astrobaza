<template>
    <div>
        <div class="d-flex pb-3" v-for="opening in openings">
            <div>{{ opening.date_formatted }}</div>
            <div class="flex-fill text-center">
                -
            </div>
            <div>godziny: <span>{{ opening.from }}</span>-<span>{{ opening.to }}</span></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Opening",

    props: ['openings']
}
</script>

<style lang="scss" scoped>

</style>
