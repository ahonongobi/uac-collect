<div>
    <label for="partner_name" class="form-label">1. Intitulé de l’institution partenaire
        (Veuillez mentionner le nom de votre organisation)</label>

    <input type="search" class="form-control mb-2" wire:model="query"
        name="partner_name" placeholder="Commencez par taper le nom de votre organisation"
        required

        />
        {{-- Application Laravel et Livewire - Recherche avancée --}}
     @if (strlen($query) > 2 && $notSelect)
        <div class="z-10 bg-white border border-gray-400 rounded w-56 px-2 py-1 mt-10 flex flex-col absolute">
            @if (count($jobs) > 0)
                @foreach ($jobs as $index => $job)
                    <p class="" wire:click="addTodo({{ $job->id }}, '{{ $job->libelle }}')">{{ $job->libelle }}</p>
                @endforeach

            @else

                <span style="color:red;">0 résultat trouvé pour {{ $query }}</span>
            @endif
        </div>

     @endif
</div>
