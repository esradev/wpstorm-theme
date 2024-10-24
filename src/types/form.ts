import { ZodTypeAny } from 'zod'

export interface FormInput {
  name: string
  label: string
  placeholder?: string
  description?: string
  type: 'text' | 'textarea' | 'switch' | 'email' | 'number'
}

export interface AppFormProps {
  schema: ZodTypeAny
  defaultValues: Record<string, any>
  inputs: FormInput[]
  headerInfo: AppFormHeaderProps
}

export interface AppFormHeaderProps {
  title: string
  description?: string
  className?: string
}
