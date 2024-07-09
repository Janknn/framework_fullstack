<template>
    <MusicLayout>
        <template #content>
            <div>
                <h1>liste de mes tracks</h1> 
                <ul>
                    <li
                        v-for="track in tracks"
                        :key="track.uuid"
                    >   
                        {{ track.title }} ({{ track.artist }})
                    </li>
                </ul>
            </div>  
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
    name: 'Index',
    components: {
        MusicLayout,
    },
    props: {
        tracks: Array
    },
}

</script>