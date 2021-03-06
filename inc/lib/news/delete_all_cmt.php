<?php
/*
 *  Copyright (C) 2009 Nouweo
 *  
 *  Nouweo is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *  
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function delete_all_cmt($id_news)
{
    Nw::$DB->query('DELETE FROM '.Nw::$prefix_table.'news_commentaires
        WHERE c_id_news = '.intval($id_news)) OR Nw::$DB->trigger(__LINE__, __FILE__);
    
    Nw::$DB->query('UPDATE '.Nw::$prefix_table.'news 
        SET n_nbr_coms = 0, n_last_com = 0
        WHERE n_id = '.intval($id_news)) OR Nw::$DB->trigger(__LINE__, __FILE__);
}
