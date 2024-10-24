import { NavLink } from 'react-router-dom'

import { Sidebar, SidebarContent, SidebarGroup, SidebarGroupContent, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar'

import { items } from '@/lib/utils'

export function AppSidebar() {
  return (
    <Sidebar side="right">
      <SidebarContent>
        <SidebarGroup>
          <SidebarGroupLabel>Wpstorm Theme Settings</SidebarGroupLabel>
          <SidebarGroupContent>
            <SidebarMenu>
              {items.map(item => (
                <SidebarMenuItem key={item.title}>
                  <SidebarMenuButton asChild>
                    <NavLink to={item.url} className={({ isActive, isPending }) => (isPending ? 'pending ' : isActive ? 'text-payamito-600 bg-gray-50 ' : 'text-gray-100 ') + 'text-gray-100 hover:text-payamito-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold'}>
                      <item.icon />
                      <span>{item.title}</span>
                    </NavLink>
                  </SidebarMenuButton>
                </SidebarMenuItem>
              ))}
            </SidebarMenu>
          </SidebarGroupContent>
        </SidebarGroup>
      </SidebarContent>
    </Sidebar>
  )
}
