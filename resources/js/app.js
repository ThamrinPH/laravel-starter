import './bootstrap';
import 'moment';
import 'laravel-datatables-vite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { registerLicense } from '@syncfusion/ej2-base';

registerLicense('Ngo9BigBOggjHTQxAR8/V1NBaF5cXmZCekx3R3xbf1x0ZFRMY1hbRXFPMyBoS35RckVnWXpecXdRR2dYUkJ2');