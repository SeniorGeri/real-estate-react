import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { Bell, BellRing, CircleGauge, Cog, Images, Megaphone, Sliders, User, UserCheck, UsersRound,Languages, Euro, ReceiptEuro, LogOut, Map } from 'lucide-react';
import AppLogo from './app-logo';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: CircleGauge,
        type: 'standalone'
    },
    {
        title: 'Hrm',
        href: 'hrm',
        icon: UsersRound,
        type: 'dropdown',
        permissions: ['agent.read', 'student.read'],
        subItems: [
            {
                title: 'Agent',
                href: route('agent.list'),
                icon: UserCheck,
                type: 'standalone',
                permission: 'agent.read',
            }
        ]
    },
    {
        title: 'Media',
        href: 'media',
        icon: Images,
        type: 'dropdown',
        permissions: ['slider.read'],
        subItems: [
            {
                title: 'Slider',
                href: route('slider.list'),
                icon: Sliders,
                type: 'standalone',
                permission: 'slider.read',
            },
        ]
    },
    {
        title: 'Notification',
        href: 'notification',
        icon: Bell,
        type: 'dropdown',
        permissions: ['notification.read','contact.read'],
        subItems: [
            {
                title: 'Notification',
                href: route('notification.list'),
                icon: BellRing,
                type: 'standalone',
                permission: 'notification.read',
            },
            {
                title: 'Contact',
                href: route('contact.list'),
                icon: Megaphone,
                type: 'standalone',
                permission: 'contact.read',
            }
        ]
    },
    {
        title: 'Settings',
        href: 'settings',
        icon: Cog,
        type: 'dropdown',
        permissions: ['country.read', 'city.read', 'language.read','method.read', 'currency.read','zone.read'],
        subItems: [
            {
                title: 'Country',
                href: route('country.list'),
                icon: Map,
                type: 'standalone',
                permission: 'country.read',
            },
            {
                title: 'City',
                href: route('city.list'),
                icon: Map,
                type: 'standalone',
                permission: 'city.read',
            },
            {
                title: 'Zone',
                href: route('zone.list'),
                icon: Map,
                type: 'standalone',
                permission: 'zone.read',
            },
            {
                title: 'Language',
                href: route('language.list'),
                icon: Languages,
                type: 'standalone',
                permission: 'language.read',
            },
            {
                title: 'Currency',
                href: route('currency.list'),
                icon: Euro,
                type: 'standalone',
                permission: 'currency.read',
            }
        
        ]
    }

];

const footerNavItems: NavItem[] = [
    {
        title: 'Main page',
        href: route('dashboard'),
        icon: LogOut,
        type: 'standalone',
    }
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
