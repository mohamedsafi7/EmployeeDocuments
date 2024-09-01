<div style="max-width: 800px; margin: 50px auto; padding: 20px; border: 2px solid #333; border-radius: 10px; background-color: #f9f9f9;">
    <div style="margin-bottom: 20px;">
        <div style="margin-bottom: 20px;">
            <p><strong>Nom:</strong> {{ $employee->name }}</p>
            <p><strong>Adresse:</strong> {{ $employee->address }}</p>
            <p><strong>Ville:</strong> {{ $employee->city }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>CIN:</strong> {{ $employee->cin }}</p>
            <p><strong>Téléphone:</strong> {{ $employee->phone }}</p>
        </div>
        
        <div style="margin-bottom: 20px;">
            <p><strong>Nom de l'entreprise:</strong> Commune Taliouine</p>
            <p><strong>Adresse de l'entreprise:</strong> Centre Taliouine</p>
            <p><strong>Ville:</strong> Taliouine</p>
        </div>
        
        <div style="margin-bottom: 20px;">
            <p>Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
            <p>Objet: Demande de congé</p>
        </div>
        
        <div style="margin-bottom: 20px;">
            <p>Madame, Monsieur,</p>
        </div>
        
        <div style="margin-bottom: 20px;">
            <p>Par la présente, je vous informe de mon souhait de prendre un congé. Je souhaite bénéficier de {{ $number_of_days }} jours de congé à partir du {{ $start_date->format('d/m/Y') }} jusqu’au {{ $end_date->format('d/m/Y') }}.</p>

            <p>Je m'engage à finaliser toutes les tâches en cours avant mon départ et à organiser une passation adéquate avec mes collègues afin d'assurer la continuité de mes fonctions durant mon absence.</p>

            <p>Je reste à disposition pour toute information complémentaire et vous remercie par avance pour l'attention portée à ma demande.</p>

            <p>Dans l'attente de réponse, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.</p>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <button onclick="window.print()" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Imprimer</button>
        </div>
    </div>
</div>
