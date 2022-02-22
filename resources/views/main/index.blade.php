<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5 mb-5">
                <div class="card">
                    <h3 style="background-color: #2a8c28 !important;" class="card-header text-white">FICHE DE COLLECTE DES PARTENAIRES NATIONAUX DE L’UAC</h3>
                    <div class="card-body">
                        @if (session('message'))                            
                            <div class="alert alert-dismissible alert-success">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        
                        <form action="{{ route('main.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="partner_name" class="form-label">Intitulé de l’institution partenaire (Veuillez mentionner le nom de votre organisation)</label>

                                <input type="search" class="form-control mb-2" id="partnership_purpose" name="partner_name" 
                                                    placeholder="Veuilez taper le nom de votre organisation..." required/>                                
                            </div>
                            
                            <div class="form-group">
                                <label for="partner_type" class="form-label mt-4">Type de partenaire (Veuillez choisir dans la liste suivante)</label>
                                <select class="selectpicker d-block" data-width="100%" id="partner_type"
                                    name="partner_type" required>
                                    <option value="public">Public</option>
                                    <option value="parapublic">parapublic</option>
                                    <option value="private">Privé</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="partnership_purpose" class="form-label mt-4">Objet du partenariat (Veuillez choisir dans la liste suivante) a selectionner plusieurs si autres afficher
                                    zone a saisir</label>
                                <select class="selectpicker d-block" data-width="100%" multiple id="partnership_purpose"
                                    name="partnership_purpose[]" required>
                                    <option selected="">Veuillez choisir dans la liste suivante</option>
                                    <option value="training">Formation</option>
                                    <option value="occupational_integration">Insertion professionnelle</option>
                                    <option value="technical_support">Appui technique</option>
                                    <option value="research">Recherche</option>
                                    <option value="mobility">Mobilité</option>
                                    <option value="financial_support">Appui financier</option>
                                    <option value="other">Autres</option>
                                </select>

                                <small id="emailHelp" class="form-text text-muted">
                                    Cliquez sur autre et précisez le type de partenariat
                                </small>
                                <div class="mt-3">
                                    <label for="">Année de signature</label>
                                    <input type="number" min="1900" max="2099" step="1" value="{{ now()->format('Y') }}" 
                                                    class="form-control mb-2" id="activityYear" name="year_signature" 
                                                    placeholder="Année d'éxécution" required/>
                                </div>
                            </div>
                            <div style="" class="container mt-5 mb-3 bg-grey text-center">
                                <h3 style="color: #2a8c28 " clas="mt-5 py-5">Différentes activités exécutées depuis la date de signature de l’accord</h3>
                            </div>
                            <div class="accordion mt-4" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-1">
                                        <button class="accordion-button collapsed text-white" style="background-color: #2a8c28;" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse-1"
                                            aria-expanded="false" aria-controls="collapse-1">
                                            Activité 1 (Veuillez cliquer et renseigner les rubriques suggérées)
                                        </button>
                                    </h2>
                                    <div id="collapse-1" class="accordion-collapse collapse"
                                        aria-labelledby="heading-1" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="activityTitle" class="form-label mt-4">Intitulé de l'activité(veuillez mentionner le nom de l’activité)</label>
                                                <input type="text" class="form-control" name="activity_1[title]" 
                                                    id="activityTitle" placeholder="Intitulé de l'activité" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="activityYear" class="form-label mt-4">Année d’exécution (Veuillez choisir l’année d’exécution de l’activité avec les flèches de
                                                    direction situées à droite de la ligne suivante)</label>

                                                <input type="number" min="1900" max="2099" step="1" value="{{ now()->format('Y') }}" 
                                                    class="form-control mb-2" id="activityYear" name="activity_1[year]" 
                                                    placeholder="Année d'éxécution" required/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="partnership_purpose" class="form-label mt-4">Structures du Rectorat impliquées (Veuillez choisir dans la liste suivante)</label>
                                                    <select class="selectpicker d-block" data-width="100%"  id="partnership_purpose" name="activity_1[structureUac]"   multiple required>
                                                        <option value="" selected="">Veuillez choisir dans la liste suivante</option>
                                                        @foreach ($uacStructures as $structure)
                                                            <option value="{{ $structure->id }}">
                                                                {{ $structure->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                
                                                
                                            </div>
                                            <!-- new -->
                                            <div class="form-group">
                                                <label for="structureEntity" class="form-label mt-4">Unités de formation et de Recherche impliquées (Veuillez choisir dans la liste suivante)</label>
                                                <select style="position: absolute;" id="structureEntity" name="activity_1[structureEntity]"  class="selectpicker d-block" data-width="100%" multiple>
                                                    <option value="" selected="">Veuillez choisir dans la liste suivante</option>
                                                    @foreach ($uacEntities as $Entity)
                                                        <option value="{{ $Entity->id }}">
                                                            {{ $Entity->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="fallout_ac" class="form-label mt-4"> Résultats obtenus 
                                                </label>
                                                <input type="text" class="form-control mb-2" name="activity_1[falloutUac][]" id="fallout_ac"
                                                    aria-describedby="falloutUacHelp" placeholder="Résultats obtenus" required>
                                                    <button type="button" style="background-color: #2a8c28;" class="add-field btn  btn-sm d-block mt-2">Ajouter un résultat</button>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                <button id="add-activity" type="button" style="background-color: #2a8c28;" class="btn btn-primary btn-sm d-block mt-3">
                                    Ajouter une activité
                                </button>
                            </div>
                            <div class="container">
                                <h3 style="color: #2a8c28">Difficultés rencontrées dans l’exécution du partenariat</h3>
                            </div>
                            <div class="form-group">
                                <label for="suggestion" class="form-label mt-4">Difficultés rencontrées
                                    </label>
                                <textarea class="form-control" id="suggestion" rows="3" name="diffulte" required></textarea>
                            </div>
                            <div class="container mt-3">
                                <h3 style="color: #2a8c28;">Suggestions pour aplanir les difficultés (Veuillez cliquer l’onglet ci-dessous pour mentionner)</h3>
                            </div>
                            <div class="form-group">
                                <label for="suggestion" class="form-label mt-4">Suggestion pour une dynamisation du
                                    patenariat</label>
                                <textarea class="form-control" id="suggestion" rows="3" name="suggestion" required></textarea>
                            </div>

                            <div  class="container mt-3 mb-3">
                                <h3 style="color: #2a8c28;">Quelques renseignements importants</h3>
                            </div>
                            <div class="form-group">
                                <label for="partner_name" class="form-label">E-mail</label>

                                <input type="search" class="form-control mb-2" id="partnership_purpose" name="email" 
                                                    placeholder="Veuillez taper votre e-mail..." required/>                                
                            </div>

                            <div class="form-group">
                                <label for="partner_name" class="form-label">Numéro de téléphone fonctionnel de l’organisation</label>

                                <input type="search" class="form-control mb-2" id="partnership_purpose" name="tel" 
                                                    placeholder="numéro de téléphone fonctionnel de l’organisation..." required/>                                
                            </div>

                            <div class="form-group">
                                <label for="partner_name" class="form-label">Identité du répondant</label>

                                <input type="search" class="form-control mb-2" id="partnership_purpose" name="identite" 
                                                    placeholder="Identité du répondant" required/>                                
                            </div>

                            <div class="form-group">
                                <label for="partner_name" class="form-label">Le poste occupé</label>

                                <input type="search" class="form-control mb-2" id="partnership_purpose" name="poste" 
                                                    placeholder="Le poste occupé" required/>                                
                            </div>
                            
                            <button style="background-color: #2a8c28;" class="btn btn-primary mt-3" type="submit">Soumettre</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <script>
        var count = 1;

        $(function () {
            $('.selectpicker').selectpicker();

            var accordionItemFirst = $('.accordion-item').first()
    
            $('#add-activity').on('click', function(e) {
                var accordionItem = accordionItemFirst.clone(true, true)

                var h2 = accordionItem.find('h2.accordion-header');

                count++

                //var count = count;
    
                h2.attr('id', h2.attr('id').split('-')[0]+'-'+(count));
    
                var accordionButton = h2.find('button.accordion-button').first();
                accordionButton.attr('data-bs-target', `#collapse-${count}`);
                accordionButton.attr('aria-controls', `collapse-${count}`);
                accordionButton.text(`Activité #${count} (Veuillez cliquer et renseigner les rubriques suggérées)`)

                //console.log(accordionButton)

                var inputs = accordionItem.find("input[type='text'], input[type='number'], select")  

                inputs.each(function () {
                    $(this).val('')
                    $(this).attr('id', $(this).attr('id')+ '_' + `${count}`)
                    $(this).attr('name', $(this).attr('name').split('_')[0] + '_' + `${count}` + $(this).attr('name').split('_')[1].substring(1, $(this).attr('name').split('_')[1].length))
                    $(this).prev('label').attr('for', $(this).prev('label').attr('for')+ '_' + `${count}`)
                })
    
                var accordionCollapse = accordionItem.find('div.accordion-collapse').first();
                accordionCollapse.attr('id', `collapse-${count}`);
                accordionCollapse.attr('aria-labelledby', `heading-${count}`);

                //console.log(accordionItem.html())
    
                accordionItem.insertAfter($('.accordion-item').last())
            });

            $('.add-field').on('click', function(e) {
                $(this).before($(this).parent().find("input[type=text]").first().clone());
                $(this).parent().find("input[type=text]").first().val('');
            })
        })
    </script>
</body>

</html>