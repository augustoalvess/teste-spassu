<div class="alert-container">
    <div *ngFor="let alert of value; let i = index;">
        <div *ngIf="alert['visible'] == null" id="alert-{{i}}" class="alert alert-{{alert['severity']}} alert-dismissible fadeout">
            <button type="button" class="close" (click)="removeAlert(i)" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>{{alert['summary']}}</h4>
            <div [innerHTML]="alert['detail']"></div>
            {{setFadeOut(i)}}
        </div>
    </div>
</div>