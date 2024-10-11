<?php

namespace App\Domain\Common\Services;

use stdClass;

class MenuService {

    public static function menu() {
        $menu = [];
        
        // Assuntos
        $menuitem = new stdClass();
        $menuitem->name = "assuntos";
        $menuitem->title = __('strings.assuntos');
        $menuitem->route = "assuntos";
        $menuitem->icon = "ri-list-check";
        $menuitem->ordenation = 1;
        $menuitem->sons = [];
        $menu[] = $menuitem;

        // Autores
        $menuitem = new stdClass();
        $menuitem->name = "autores";
        $menuitem->title = __('strings.autores');
        $menuitem->route = "autores";
        $menuitem->icon = "ri-user-line";
        $menuitem->ordenation = 2;
        $menuitem->sons = [];
        $menu[] = $menuitem;

        // Livros
        $menuitem = new stdClass();
        $menuitem->name = "livros";
        $menuitem->title = __('strings.livros');
        $menuitem->route = "livros";
        $menuitem->icon = "ri-book-2-line";
        $menuitem->ordenation = 3;
        $menuitem->sons = [];
        $menu[] = $menuitem;        
        
        // Relatório
        $menuitem = new stdClass();
        $menuitem->name = "relatorio";
        $menuitem->title = __('strings.relatorio');
        $menuitem->route = "relatorio";
        $menuitem->icon = "ri-file-chart-line";
        $menuitem->ordenation = 4;
        $menuitem->sons = [];
        $menu[] = $menuitem;
            
        return $menu;
    }

}