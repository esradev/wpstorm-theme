import { SidebarProvider } from '@/components/ui/sidebar'
import { AppSidebar } from '@/components/app-sidebar'
import AppHeader from '@/components/app-header'

export default function Layout({ children }: { children: React.ReactNode }) {
  return (
    <SidebarProvider>
      <AppSidebar />
      <main className="w-full">
        <AppHeader />
        {children}
      </main>
    </SidebarProvider>
  )
}
