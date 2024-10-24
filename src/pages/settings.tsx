import { AppForm } from '@/components/app-form'
import { z } from 'zod'

import { FormInput } from '@/types/form'

const Settings = () => {
  const formSchema = z.object({
    username: z.string().min(2, { message: 'Username must be at least 2 characters.' }),
    bio: z.string().optional(),
    notifications: z.boolean()
  })

  const defaultValues = {
    username: '',
    bio: '',
    notifications: false
  }

  const inputs: FormInput[] = [
    { name: 'username', label: 'Username', placeholder: 'Enter your username', type: 'text' },
    { name: 'bio', label: 'Bio', placeholder: 'Tell us about yourself', description: 'Plase enter a short bio.', type: 'textarea' },
    { name: 'notifications', label: 'Enable Notifications', description: 'Get all the latest updates and news.', type: 'switch' }
  ]

  const headerInfo = {
    title: 'Settings',
    description: 'Update your account settings.'
  }

  return <AppForm schema={formSchema} defaultValues={defaultValues} inputs={inputs} headerInfo={headerInfo} />
}

export default Settings
