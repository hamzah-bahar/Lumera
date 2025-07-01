@props(['user'])
<div {{ $attributes }} x-data="{
    following: {{ auth()->user() ? $user->isFollowedBy(auth()->user()) ? 'true' : 'false' : 'false' }},
    followersCount: {{ $user->followers()->count() }},
    follow(){
        this.following = !this.following; 
        axios.post('{{ route('follow',$user) }}')
        .then(result => {
            this.followersCount = result.data.followersCount;
        })
        .catch(error => {
            console.log(error);
        });
    },
}">
    {{ $slot }}
</div>
