<div class="container">
    <div class="document-wrapper">
        <div class="header">
            <p><strong>Nom:</strong> {{ $employee->name }}</p>
            <p><strong>Adresse:</strong> {{ $employee->address }}</p>
            <p><strong>Ville:</strong> {{ $employee->city }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>CIN:</strong> {{ $employee->cin }}</p>
            <p><strong>Téléphone:</strong> {{ $employee->phone }}</p>
        </div>
        
        <div class="company-info">
            <p><strong>Nom de l'entreprise:</strong> Commune Taliouine</p>
            <p><strong>Adresse de l'entreprise:</strong> Centre Taliouine</p>
            <p><strong>Ville:</strong> Taliouine</p>
        </div>
        
        <div class="date-and-subject">
            <p>Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
            <p>Objet: Demande de congé</p>
        </div>
        
        <div class="salutation">
            <p>Madame, Monsieur,</p>
        </div>
        
        <div class="body">
        <p>Par la présente, je vous informe de mon souhait de prendre un congé. Je souhaite bénéficier de {{ $number_of_days }} jours de congé à partir du {{ $start_date->format('d/m/Y') }} jusqu’au {{ $end_date->format('d/m/Y') }}.</p>

            <p>Je m'engage à finaliser toutes les tâches en cours avant mon départ et à organiser une passation adéquate avec mes collègues afin d'assurer la continuité de mes fonctions durant mon absence.</p>

            <p>Je reste à disposition pour toute information complémentaire et vous remercie par avance pour l'attention portée à ma demande.</p>

            <p>Dans l'attente de réponse, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.</p>
        </div>
        
        <div class="text-center mt-4">
            <button onclick="window.print()" class="btn btn-primary">Imprimer</button>
        </div>
    </div>
</div>
