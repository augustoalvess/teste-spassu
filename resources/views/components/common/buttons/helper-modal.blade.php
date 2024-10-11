<a title="{{title}}" (click)="openModalAction(modal)">
    <img src="assets/images/help.png">
</a>
<modal name="{{name}}" title="{{placeholder}}" [visible]="visible" #modal>
    <ng-content></ng-content>
</modal>