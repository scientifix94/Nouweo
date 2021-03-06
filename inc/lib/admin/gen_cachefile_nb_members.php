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

function gen_cachefile_nb_members()
{   
    $query = Nw::$DB->query( 'SELECT COUNT(*) as count FROM '.Nw::$prefix_table.'members WHERE u_active = 1') OR Nw::$DB->trigger(__LINE__, __FILE__);
    $dn = $query->fetch_assoc();
    $query->free();
    
    $content_cachefile = '<?php '."\r".'Nw::$total_membres = '.$dn['count'].'; '."\r".'?>';
    file_put_contents(PATH_ROOT.Nw::$assets['dir_cache'].Nw::$site_lang.'.nb_members.php', $content_cachefile);
}
