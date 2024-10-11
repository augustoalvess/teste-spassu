<div class="dropdown">
    <button name="{{name}}" title="{{title}}" icon="{{icon}}" class="btn {{class}} dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" [disabled]="disabled" (click)="onShowItens()"></button>
    <div class="dropdown-menu" [class.show]="showItens">
        <a class="dropdown-item" [class.disabled]="item.disabled" *ngFor="let item of items" (click)="clickEvent(item)">{{item.label}}</a>
    </div>
</div>